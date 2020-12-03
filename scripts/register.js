
fetch('./checkLoginStatus.php')
    .then(response => response.json())
    .then(isLoggedResponse => {
        if (isLoggedResponse.logged) {
            document.location = "./homepage.html";
        } else {
            const loader = document.getElementById('loader');
            if (loader) {
                document.body.removeChild(loader);
            }
            document.getElementById('register-form').style.display = 'block';
        }
    });


// function ajax(url, settings) {
//     var xhr = new XMLHttpRequest();
//     xhr.onload = function(){
//       if (xhr.status == 200) {
//         settings.success(xhr.responseText);
//       } else {
//         console.error(xhr.responseText);
//       }
//     };
//     xhr.open(settings.method || 'GET', url, /* async */ true);
//     xhr.send(settings.data || null);
//   }


// const isLoggedCallback = responseText => {
//     let response = JSON.parse(responseText);
//     if (response.logged) {
//          document.location = "./homepage.html";
//     }
// };

// ajax('./checkLoginStatus.php', {success: isLoggedCallback});
