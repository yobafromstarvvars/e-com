// LOGIN FORM VALIDATION WITH 'JUST VALIDATE' LIBRARY

const validation = new JustValidate('#login-form');
validation
    .addField("#email", [
        {
            rule: "required"
        },
        {
            rule: "email"
        }
    ])
    .addField("#password", [
        {
            rule: "required"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("login-form").submit();
    });


