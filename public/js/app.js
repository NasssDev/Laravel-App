import './bootstrap';

// import intlTelInput from "intl-tel-input";
//
// window.intlTelInput = intlTelInput;

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

if(document.getElementById('notifDiv')){
    setTimeout(function() {
        const notifDiv = document.getElementById('notifDiv');
        notifDiv.remove();
    }, 7000);
}


if(document.querySelector("#phone")) {
    const inputPhone = document.querySelector("#phone");

    const iti = window.intlTelInput(inputPhone, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
        preferredCountries: ['fr', 'be', 'es', 'ch', 'it', 'de', 'gb', 'us'],
        separateDialCode: true,
        nationalMode: true,
        initialCountry: 'fr',
    });

    const phoneHiddenInput = document.querySelector("#phoneHiddenInput");
    const spPhone = document.querySelector("#spPhone");
    const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

    const handleChange = () => {
        if (inputPhone.value) {
            if (iti.isValidNumber()) {
                inputPhone.classList.remove("border-red-500", "focus:border-red-500", "focus:ring-red-500");
                spPhone.classList.remove('text-red-500');
                spPhone.innerHTML = "✓ Valid";
                inputPhone.classList.add("border-green-500", "focus:border-green-500", "focus:ring-green-500");
                spPhone.classList.add("text-green-500");
                spPhone.style.display = 'block';
                phoneHiddenInput.value = iti.getNumber();
            } else {
                inputPhone.classList.remove("border-green-500", "focus:border-green-500", "focus:ring-green-500");
                spPhone.classList.remove('text-green-500');
                const errorCode = iti.getValidationError();
                spPhone.innerHTML = errorMap[errorCode];
                inputPhone.classList.add("border-red-500", "focus:border-red-500", "focus:ring-red-500");
                spPhone.classList.add("text-red-500");
                spPhone.style.display = 'block';
            }
        }
    };
    inputPhone.addEventListener('keyup', handleChange);
    inputPhone.addEventListener('change', handleChange);
}




if(document.querySelector("#address")){

    let address = document.querySelector('#address');
    let postalCode = document.querySelector('#postalCode');
    let city = document.querySelector('#city');

    let select = document.querySelector('#selection');

    window.onload = () => {
        address.addEventListener("input", autoComplete, false);
    };

    addEventListener("click", (clicks) => {
        if (clicks.target != address && clicks.target != select && select.style.display === "block") {
            select.style.display = "none";
        }
    });


    function autoComplete() {

        let inputValeur = address.value;
        if (inputValeur && inputValeur.length > 3) {

            let addressURL = 'https://api-adresse.data.gouv.fr/search/?q='+inputValeur;
            callAPI(addressURL);

        } else {
            select.style.display = "none";
        }
    }

    function callAPI(requestURL) {
        fetch(requestURL)
            .then(response => response.json())
            .then(obj => {
                if (obj != null) {
                    displaySelection(obj);
                } else {
                    console.log(`Aucune réponse.`);
                }
            })
            .catch(error => {
                console.log(`Une erreur s'est produite : ${error}`);
            });
    }

    function displaySelection(response) {
        if (Object.keys(response.features).length > 0) {
            select.style.display = "block";
            select.innerHTML = '';

            var ul = document.createElement('ul');
            select.appendChild(ul);

            response.features.forEach( (element) => {
                var li = document.createElement('li');
                var lineAddress = document.createElement('span');
                lineAddress.innerHTML = element.properties.name;
                var infosAddress = document.createTextNode(element.properties.postcode + ' ' + element.properties.city);
                li.onclick = () => { selectionAddress(element); };
                li.appendChild(lineAddress);
                li.appendChild(infosAddress);
                ul.appendChild(li);
            });
        } else {
            select.style.display = "none";
        }
    }

    function selectionAddress(element) {
        address.value = element.properties.name;
        postalCode.value = element.properties.postcode;
        city.value = element.properties.city;
        select.style.display = "none";
    }
}
