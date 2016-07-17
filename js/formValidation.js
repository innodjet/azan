

$(document).ready(function () {

    $('#formPub').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nomEve: {
                validators: {
                    notEmpty: {
                        message: "Nom de l'évènement requis"
                    },
                    stringLength: {
                        max: 80,
                        //min: 10,
                        message: 'Le nom doit avoir au maximum 75 caracteres'
                    }
                }
            },
            lieuEve: {
                validators: {
                    notEmpty: {
                        message: "Nom de l'évènement requis"
                    }
                }
            },
            prixEve: {
                validators: {
                    notEmpty: {
                        message: "Renseigner le prix"
                    },
                    numeric: {
                        message: 'Renseigner le prix en chiffre',
                        // The default separators
                        thousandsSeparator: '',
                        decimalSeparator: ','
                    }
                }
            },
            dateMiseEnLigneEve: {
                validators: {
                    notEmpty: {
                        message: 'Renseigner la date de la mise en ligne'
                    },
                    date: {
                        format: 'DD-MM-YYYY',
                        message: 'Date invalide'
                    }
                }
            },
            datedebutEve: {
                validators: {
                    notEmpty: {
                        message: 'Renseigner la date de début'
                    },
                    date: {
                        format: 'DD-MM-YYYY h:m',
                        message: 'Date invalide'
                    }
                }
            },
            datefinEve: {
                validators: {
                    notEmpty: {
                        message: 'Renseigner la date de fin'
                    },
                    date: {
                        format: 'DD-MM-YYYY h:m',
                        message: 'Date invalide'
                    }
                }
            },
            contactEve: {
                validators: {
                    notEmpty: {
                        message: "Renseigner un contact par exemple un numero de telephone"
                    }
                }
            },
            descriptionEve: {
                validators: {
                    notEmpty: {
                        message: "Décrivz nous au moins votre évènement"
                    },
                    stringLength: {
                        min: 50,
                        message: 'La description doit comporter au moins 50 caractères'
                    }
                }
            },
            type: {
                validators: {
                    notEmpty: {
                        message: "Selectionner un type d'événement"
                    }
                }
            },


        }
    });



    $('#inscription_form').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            pseudo: {
                validators: {
                    notEmpty: {
                        message: "Le pseudo est obligatoire"
                    },
                    stringLength: {
                        max: 80,
                        //min: 10,
                        message: 'Le pseudo doit avoir au maximum 80 caracteres'
                    },
                    remote: {
                        message: 'Ce pseudo est déja utilisé',
                        url: 'ajax/verif.php',
                        data: {
                            type: 'pseudo'
                        },
                        type: 'POST'
                    }
                }
            },
            email: {
                verbose: false,
                validators: {
                    notEmpty: {
                        message: 'Adresse email requise'
                    },
                    emailAddress: {
                        message: 'Adresse email invalide'
                    },
                    stringLength: {
                        max: 512,
                        message: "L' adresse email ne peux pas 100 characters"
                    },
                    remote: {
                        type: 'GET',
                        url: 'https://api.mailgun.net/v2/address/validate?callback=?',
                        crossDomain: true,
                        name: 'address',
                        data: {
                            api_key: 'pubkey-36df9b06989807c71f588b584a92950a'
                        },
                        dataType: 'jsonp',
                        validKey: 'is_valid',
                        message: 'Adresse email incorrecte'
                    },
                    remote: {
                        message: 'Cette adresse email est déjà utilisée',
                        url: 'ajax/verif.php',
                        data: {
                            type: 'email'
                        },
                        type: 'POST'
                    }
                }
            }


        }
    });


    $('#formPubSuite1').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            file_couv: {
                validators: {
                    notEmpty: {
                        message: 'Selecttionner une image'
                    },
                    file: {
                        extension: 'jpeg,jpg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 2 * 1024 * 1024,
                        message: 'Sélectionner une image ne dépassant pas 2 MB'
                    }
                }
            }
        }
    });

});


