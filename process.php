<?php
    session_start();
    require('classes/Auth.class.php');
    require('classes/Database.class.php');
    require('classes/ContactModel.class.php');
    // co je v poli POST
    //sprint_r($_POST);

    if(isset($_POST['action'])){
        // akce existuje, zpracujeme form data
        switch($_POST['action']){
            case 'auth':
                MyAuth::loginUser($_POST['username'], $_POST['password']);
                break;
            case 'create':
                // vytvor noveho uzivatele
                $NewC = new Contact();
                $NewC->Name = htmlspecialchars($_POST['name']);
                $NewC->Surname = htmlspecialchars($_POST['surname']);
                $NewC->Save();
                break;
            case 'delete':
                $ContactToDel = Contact::Load(intval($_POST['id']));
                $ContactToDel->Delete();
                break;
        }
    }
    // redirect
    header('location:index.php');
?>