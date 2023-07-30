// async function test() {
//     let txt = isAvailable();
//     console.log(txt);
// }

// async function isAvailable() {
//     return fetch("/other/music_house/scripts/is_email_available.php?email=admin@adminc.com")
//     .then(res => {
//         if (res.ok) {
//             return res.json()
//         } else {
//             console.log("Request not successful.")
//         }
//     })
//     .then(data => {return data})
//     .catch(error => console.log('error'))
// }

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


