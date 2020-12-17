const submitFormHandler = event => {
    event.preventDefault();

    const formElement = event.target;

    // validate form
    const formData = {
        email: formElement.querySelector('input[name="email"]').value,
        password: formElement.querySelector('input[name="password"]').value,
    };


    fetch(formElement.getAttribute('action'), {
        method: 'POST',
        // credentials: "same-origin",
        // headers: {
        //     'Content-Type': 'application/json',  // sent request (alt: 'application/x-www-form-urlencoded')
        //     'Accept':       'application/json'   // expected data sent back
        // },
        body: JSON.stringify(formData),
    });

    // handle response
};


const form = document.querySelector('form');

form.addEventListener('submit', submitFormHandler);