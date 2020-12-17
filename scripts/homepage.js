/**
 * Representing residents in the building 
 */
class Resident {
    constructor(residentObject) {
      this.id = residentObject.id;
      this.name = residentObject.name;
      this.phoneNumber = residentObject.phoneNumber;
      this.email = residentObject.email;
    }
  
    /**
     * Creates an HTML element that can be used for displaying resident info
     * 
     * @returns HTML element with resident data for display
     */
    getDisplayElement() {
        let residentWrapper = document.createElement('div');
        residentWrapper.innerHTML = `<div id="${this.id}">
                                        <span class="name">name: ${this.name}</span>,
                                        <span class="email">email: ${this.email}</span>
                                    </div>`;

        const div = document.createElement('div');
        div.setAttribute('id', this.id);

        // name
        const spanName = document.createElement('span');
        spanName.setAttribute('class', 'name');
        const nameText = document.createTextNode('name: ' + this.name);
        spanName.appendChild(nameText);

        // email
        const spanEmail = document.createElement('span');
        spanEmail.setAttribute('class', 'email');
        const emailText = document.createTextNode('email: ' + this.email);
        spanEmail.appendChild(emailText);

        div.appendChild(spanName);
        div.appendChild(spanEmail);

        return div;
    }
}

/**
 * Methods that display parts of the page
 */
const display = {
    residentsContainer: () => {
        let residentsContainerElement = document.createElement('div');
        residentsContainerElement.setAttribute('id', 'residents');
        document.body.appendChild(residentsContainerElement);
        return residentsContainerElement;
    },
    resident: (resident, container) => {
        container.appendChild(resident.getDisplayElement());
    }
};

/**
 * Methods meant to be executed when the page and all page data is loaded 
 */
const onPageLoadHandlers = {
    /**
     * Loads the residents asynchronously from the server and displays them on the page 
     */
    loadResidents: () => fetch('./residents.php')
                        .then(response => response.json())
                        .then(residentsList => {
                            const residentsContainer = display.residentsContainer();
                            
                            for (let index = 0; index < residentsList.length; index ++) {
                                display.resident(new Resident(residentsList[index]), residentsContainer);
                            }
                        }),
    /**
     * Shows a message in the console that tha page is loaded
     */
    printSuccessMessage: () => console.info('Page is loaded'),
    testLocalStorage: () => {

        let storedData = null;
        itemInLocalStorage = localStorage.getItem('test1');
        if (itemInLocalStorage) {
            storedData = JSON.parse(itemInLocalStorage);
        } else {
            storedData = {};
        }

        console.log(storedData);
    }
};

fetch('./checkLoginStatus.php')
    .then(response => response.json())
    .then(isLoggedResponse => {
        if (!isLoggedResponse.logged) {
            document.location = './login.html';
        } else {
            for (handler in onPageLoadHandlers) {
                onPageLoadHandlers[handler]();
            }
        }
    });