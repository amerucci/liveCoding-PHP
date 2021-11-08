let region = document.getElementById('lesregions')
let departement = document.getElementById('lesdepartements')


function init() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var communess = JSON.parse(this.response)

            let laliste = document.getElementById("laliste")
            for (let i = 0; i < communess.length; i++) {
                console.log(communess[i][0])
                laliste.innerHTML += '<tr><th scope="col">' + communess[i][0] + '</th><th scope="col">' + communess[i].cp_commune + '</th><th scope="col">' + communess[i].population_commune + '</th><th scope="col">' + communess[i].nom_departement + '</th><th scope="col">' + communess[i].nom_region + '</th></tr>'
            }
        }
    }
    xmlhttp.open("GET", "search.php")
    xmlhttp.send()
}










function showDepartmentList() {
    document.getElementById("lesdepartements").innerHTML = ""
    if (region.value != "") {
        departement.style = "display:block!important"

        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var departements = JSON.parse(this.response)
                console.log(departements)
                document.getElementById("lesdepartements").innerHTML += '<option value="">Selecionnez une région</option>'
                for (let i = 0; i < departements.length; i++) {
                    document.getElementById("lesdepartements").innerHTML += '<option value="' + departements[i].nom_departement + '">' + departements[i].nom_departement + '</option>'
                }
            }
        }
        xmlhttp.open("GET", "search.php?region=" + region.value)
        xmlhttp.send()
    } else {
        departement.style = "display:none!important"
    }

}



region.addEventListener('change', function () {


    showDepartmentList()
   



})

departement.addEventListener('change', function () {
// alert(departement.value)

    laliste.innerHTML = ""
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var communes = JSON.parse(this.response)

            let laliste = document.getElementById("laliste")
            for (let i = 0; i < communes.length; i++) {
                console.log(communes[i][0])
                laliste.innerHTML += '<tr><th scope="col">' + communes[i][0] + '</th><th scope="col">' + communes[i].cp_commune + '</th><th scope="col">' + communes[i].population_commune + '</th><th scope="col">' + communes[i].nom_departement + '</th><th scope="col">' + communes[i].nom_region + '</th></tr>'
            }
        }
    }
    xmlhttp.open("GET", "search.php?departement=" + departement.value)
    xmlhttp.send()




})