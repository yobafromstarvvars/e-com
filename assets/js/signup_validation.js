// SIGN UP FORM VALIDATION WITH 'JUST VALIDATE' LIBRARY

// Get root url
let script = document.currentScript;
let fullUrl = script.src;
let rootUrl = '/' + fullUrl.split('//')[1].split('/').slice(1, -3).join('/') + '/';


const validation = new JustValidate('#signup-form');
let passwordErrorMsg = "Password must contain minimum 12 characters, at least one letter and one number";
validation
    .addField("#Name", [
        {
            rule: "required"
        },
        {
            rule: "customRegexp",
            value: /^[\w'\-,.0-9][^_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/gi
        }
    ])
    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        },
        {
            validator: (value) => () => {
                // Check email availability
                return fetch(rootUrl + "scripts/is_email_available.php?email=" + encodeURIComponent(value))
                .then(res => {
                    if (res.ok) {
                        return res.json()
                    } else {
                        console.log("Request not successful.")
                    }
                })
                .then(data => {
                    return data.available
                })
                .catch(error => console.log('error'))
            },
            errorMessage: "Email already taken"
        }
    ])
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password",
            errorMessage: passwordErrorMsg
        },
        {
            rule: "minLength",
            value: 12,
            errorMessage: passwordErrorMsg
        }
    ])
    .addField("#password_repeat", [
        {
            rule: "required"
        },
        {
            validator: (value, fields) => {
                return value === fields["#password"].elem.value;
            },
            errorMessage: "Passwords should match"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("signup-form").submit();
    });
