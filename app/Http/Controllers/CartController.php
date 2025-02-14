<?php

namespace App\Http\Controllers;

use App\Models\Voyage;
use Illuminate\Http\Request;

class CartController extends Controller
{



    public function cart()
    {


         return view('cart');

    }
    public function addToCart(Request $request)
    {

        $id=$request->id;
        $qte=$request->quantity;
        $datev=$request->datev;
        $voyage = Voyage::find($id);


        $cart = session()->get('cart');

        // if cart is empty then this the first voyage
        if(!$cart) {

            $cart = [
                    $id => [
                        "Code_Voyage" => $voyage->Code_Voyage,
                        "quantity" => $qte,
                        "price" => $voyage->Prix,
                        "ville_depart" => $voyage->Ville_Depart,
                        "ville_arrivee" => $voyage->Ville_Arrivee,
                        "heure_depart" => $voyage->Heure_Depart,
                        "heure_arrivee" => $voyage->Heure_Arrivee,
                        "date_voyage"=>$datev
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart); // this code put product of choose in cart

            return redirect()->back()->with('success', 'added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity
        $cart[$id] = [
            "Code_Voyage" => $voyage->Code_Voyage,
            "quantity" => $qte,
            "price" => $voyage->Prix,
            "ville_depart" => $voyage->Ville_Depart,
            "ville_arrivee" => $voyage->Ville_Arrivee,
            "heure_depart" => $voyage->Heure_Depart,
            "heure_arrivee" => $voyage->Heure_Arrivee,
            "date_voyage"=>$datev
        ];

        session()->put('cart', $cart); // this code put product of choose in cart

        return redirect()->back()->with('success', ' added to cart successfully!');


    }



     // update product of choose in cart
 public function updatec(Request $request)
 {
     if($request->input('id') and $request->quantity)
     {
         $cart = session()->get('cart');

         $cart[$request->id]["quantity"] = $request->quantity;

         session()->put('cart', $cart);

         session()->flash('success', 'Cart updated successfully');
     }

 }

 // delete or remove product of choose in cart
 public function removec(Request $request)
 {
     if($request->id) {

         $cart = session()->get('cart');

         if(isset($cart[$request->id])) {

             unset($cart[$request->id]);

             session()->put('cart', $cart);
         }

         session()->flash('success', 'Product removed successfully');
     }

 }



 public function saisievoyageurs()
{
    // Récupérez les détails du panier de session
    $cart = session()->get('cart');

    // Assurez-vous que le panier n'est pas vide
    if (!$cart) {

        return redirect()->back()->with('success', 'Your cart is empty.');
    }

    // Chargez la vue pour la saisie des informations des voyageurs
    return view('saisi',['cart'=>$cart]);
}





public function valider(Request $request)
{
    // Récupérer les données des voyageurs depuis le formulaire
    $voyageurs = $request->input('voyageurs');

    // Assurez-vous que les données ont été récupérées avec succès
    if ($voyageurs) {



      session()->flush();


      return view('details_voyageurs',['voyageurs'=>$voyageurs]);


            }
     else {
        // Gérer le cas où les données des voyageurs ne sont pas disponibles
        // Peut-être rediriger l'utilisateur vers une page d'erreur ou afficher un message approprié
        return redirect()->back()->with('error', 'Les données des voyageurs ne sont pas disponibles.');
    }
}


}
