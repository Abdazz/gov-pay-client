<?php

namespace Abdazz\GovPayClient\Http\Controllers;

use App\Http\Controllers\Controller;
use Abdazz\GovPayClient\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DemandeController extends Controller
{

    public function create()
    {
        return view("govpayclient:demandes.create");
    }


    public function store(Request $request)
    {
        $validatedDemande=$request->validate([
            "email" => "required|email",
            "montant" => "numeric|required",
        ]);
        $demande=Demande::create([
            "ref" => Str::uuid(),
            "montant" => $request->montant,
            "email" => $request->email,
        ]);

        $s = config("payement.reference");

        // dd($s);
        return redirect(config("payement.server_endpoint").$demande->ref."/".$s);
    }

    public function sendData($ref, $s) {

        $cs = config("payement.reference");
        $payementMethods = config("payement.payementMethods");

        if($s==$cs){
            $demande= Demande::where("ref", $ref)->first();
            if($demande instanceof Demande){
                $data=[
                    "montant" => $demande->montant,
                    "email" => $demande->email,
                    "payementMethods" => $payementMethods,
                ];
                return response()->json($data);
            }else
                return "Comande non valide";
        }
        else{
            return "Service non valide";
        }


    }


    public function callback(Request $request){
        $data=[
            'serviceId' => config("payement.reference"),
            'code' => $request->code,
            'ref' => $request->ref,
        ];
        // dd($request->code);
        $response = Http::get(config("payement.server_check_endpoint"), $data);

        // Mettre à jour la le champ statut_payement sur la table demande
        $updateStatut=Demande::where("ref", $request->ref)->where("statut_payement", false)->update([
            "statut_payement" => true
        ]);

        if(!$updateStatut){
            $errorMessage = "La référence de la facture a été tronquée";
            return view("govpay::demandes.create", ["errorMessage" => $errorMessage]);
        }else
        return view("govpay::demandes.create", ["response" => $response]);
    }
}
