@component('mail::message')
# Du nouveau sur Shopify

Un nouveau produit vient d'être ajouté sur votre plateforme shopify.
N'hésitez pas à le consulter en cliquant sur le bouton ci-dessous.

@component('mail::button', ['url' => url('produits')])
Voir le produit
@endcomponent

Merci d'avoir choisi Shopify pour votre shopping !<br><br>
{{ config('app.name') }}
@endcomponent
