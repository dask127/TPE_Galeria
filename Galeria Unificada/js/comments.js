

//por ahora asi puedo pedir el id de la obra 
let ubication = window.location.pathname;
let ubication_array = ubication.split('/');
let art_id = ubication_array[ubication_array.length - 1];

getTasks();


function getTasks() {
    fetch("api/obras/" + art_id, {
        'method': 'GET',
    })
        .then(response => {
            response.json().then(json => {
                console.log(response);
                if (response.status == "200") {
                    // for (let comentario of json) {

                    // }
                }
                else {
                    console.log("Error no conocido.");
                }
            })
        })
        .catch(function (e) {
            console.log("Error, no hay internet.");
        })
}


// function addTask() {

//     const task = {
//         title: document.querySelector('input[name="input_title"]').value,
//         description: document.querySelector('input[name="input_description"]').value,
//         completed: document.querySelector('input[name="input_completed"]').checked,
//         priority: document.querySelector('input[name="input_priority"]').value
//     }

//     fetch('api/tareas', {
//         method: 'POST',
//         headers: { "Content-Type": "application/json" },
//         body: JSON.stringify(task)
//     })
//         .then(response => response.json())
//         .then(task => app.tasks.push(task))
//         .catch(error => console.log(error));

// }