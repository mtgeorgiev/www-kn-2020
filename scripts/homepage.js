const loadResidents = () => fetch('./residents.php')
                        .then(response => response.json())
                        .then(response => console.log(response));

fetch('./checkLoginStatus.php')
    .then(response => response.json())
    .then(isLoggedResponse => {
        if (!isLoggedResponse.logged) {
            document.location = './login.html';
        } else {
            loadResidents();
        }
    });
