<x-auth-layout title="Inscription" :action="route('register')" submitMessage="Inscription" titleForm="Inscription"
               infoForm="">
    <x-form.input name_label="Nom et Prénom" name="name" label="Nom complet" />
    <x-form.input name_label="Email" name="email" label="Adresse e-mail" type="email" />
    <x-form.input name_label="Mot de passe" name="password" label="Mot de passe" type="password" />
    <x-form.input name_label="Confirmer votre mot de passe" name="password_confirmation" label="Confirmation du mot de passe" type="password" />
    <div>
        <a href="{{Route('login')}}">Si vous êtes déjà inscrit cliquer ici</a>
    </div>
    <div>
        <label for="is_teacher">Êtes-vous enseignant ?</label>
        <input type="checkbox" name="is_teacher" value="1">
    </div>

    <div>
        <label for="is_manager">Êtes-vous gestionnaire ?</label>
        <input type="checkbox" name="is_manager" value="1">
    </div>
</x-auth-layout>
