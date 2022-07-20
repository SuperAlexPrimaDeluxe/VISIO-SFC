const urlApi = 'http://localhost/VISIO_SFC/php-api/'
        const connectForm = document.querySelector('.connexion')
        const deconnectLink = document.querySelector('.deconnexion')


        // deconnectLink.addEventListener('click', (e) => {
        //     e.preventDefault()
        //     fetch(urlApi + 'deconnect')
        //     .then(response => response.json())
        //     .then(response => {
        //         console.log(response)
        //     })
        //     .catch(error => console.error(error))
        // })


        connectForm.addEventListener('submit', (e) => {
            e.preventDefault()
            let ident = {
                login: document.querySelector('.login').value ,
                password: document.querySelector('.password').value
            }

            fetch(urlApi + 'auth', {
                headers: {
                    "content-type": "application/json"
                },
                method: 'POST',
                body: JSON.stringify(
                    ident
                )
            })
            .then(response => response.json())
            .then(
                response => {console.log(response)
                if(response.code == 200) { // si le code de connection est sur 200,
                    localStorage.setItem('token', response.token) // on va chercher le token dans la réponse et on le met dans le session storage
                    if(response.level == "stagiaire") { 
                        window.location.href = "stagiaire.html";  
                    }
                    else if(response.level == "formateur") {
                        window.location.href = "formateur.html";
                    }
                }
            })
            
           .catch(error => console.log(error))
        })
        