// let content  = document.getElementById('contentbox');


function callapi(){

url =   "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&exintro&explaintext&redirects=1&titles=hyundai";
var headers = {}

fetch(url,{
    mode : 'no-cors'
}).then((response)=>{

return response.text();

}).then((data)=>{

    console.log(data);
})


}
callapi()


function onGet() {
    const url = "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&exintro&explaintext&redirects=1&titles=hyundai";
    var headers = {}
    
    fetch(url, {
        method : "GET",
        mode: 'no-cors',
        headers: headers
    })
    .then((response) => {
        // if (!response.ok) {
        //     throw new Error(response.error)
        // }
        return response.text();
    })
    .then(data => {
        console.log(data.messages) ;
    })
    // .catch(function(error) {
    //     console.log (error);
    // });
}

onGet()

