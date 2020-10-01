function cargarRecientes() {

    let baseURL = 'http://web-unicen.herokuapp.com/api/groups/';
    let groupID = '148clgallery';
    let collectionID = 'obras';
    let lista = document.querySelector("#js-recent_artwork");

    function recibirObras() {
        fetch(baseURL + groupID + "/" + collectionID, {
            'method': 'GET',
        })
            .then(response => {
                response.json().then(json => {
                    if (json.status == "OK") {
                        for (let obra of json.obras) {
                            if(obra.thing.imagen == ""){
                                obra.thing.imagen = "https://www.dekrs.com/img/image_not_found.png";
                            }
                            mostrarObra(obra);
                        }
                    }
                    else {
                        console.log(json.message);
                    }
                })
            })
            .catch(function (e) {
                console.log("Error, no hay internet.");
            })
    }


    recibirObras();

}