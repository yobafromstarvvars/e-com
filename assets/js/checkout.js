// PROCESSING CHECKOUT FORM

const validation = new JustValidate('.form-regular');
const date = new Date().toDateString();
validation
    .addField("#card_number", [
        {
            rule: "required"
        },
        {
            rule: 'customRegexp',
            value: /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$/,
            errorMessage: "Incorrect card number format"
        }
    ])
    .addField("#card_holder", [
        {
            rule: "required"
        },
        {
            rule: 'customRegexp',
            value: /[a-z]+\s[a-z]+/i,
            errorMessage: "Incorrect card holder name format: should contain two words in latin"
        }
    ])
    .addField("#valid_thru", [
        {
            rule: "required"
        },
        {
            validator: (value) => {
                return new Date(value).toDateString() <= date;
            },
            errorMessage: 'The card has expired.',
          },
    ])
    .addField("#CVV", [
        {
            rule: "required"
        },
        {
            rule: 'customRegexp',
            value: /[0-9]{3}/,
            errorMessage: "Incorret CVV format"
        }
    ])
    .onSuccess((event) => {
        document.getElementsByClassName("form-regular")[0].submit();
    });