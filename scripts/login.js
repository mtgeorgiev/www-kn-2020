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
        body: JSON.stringify(formData),
    })
    .then(response => response.json())
    .then(({success}) => {
        if (success) {
            document.location = 'homepage.html';
        } else {
            console.error('invalid login');
        }
    });

    // handle response
};


const form = document.querySelector('form');

form.addEventListener('submit', submitFormHandler);