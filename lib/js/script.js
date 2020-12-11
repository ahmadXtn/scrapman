
//const domainName='89.185.39.158:443';
//const url=`https://${domainName}/epubs/LEROBERT/bibliomanuels/distrib_gp/2/1/10021/online/OEBPS/TOC.xhtml`;
//const url="https://biblio.lerobert.com/epubs/LEROBERT/bibliomanuels/distrib_gp/2/1/10021/online/OEBPS/TOC.xhtml";
/*function fetchData(url) {

    fetch(url,{
        mode:"no-cors"
    }).then(function (response) {
        // The API call was successful!
        return response.text();
    }).then(function (html) {

        // Convert the HTML string into a document object
        var parser = new DOMParser();
        var doc = parser.parseFromString(html, 'text/html');

        console.log(doc);

    }).catch(function (err) {
        // There was an error
        console.warn('Something went wrong.', err);
    });
}
*/


let hyperlinks=document.querySelectorAll("ol>li>a");
let inputELm=document.getElementById("data");

let sendButton=document.getElementById('send');

let arrayOfHyperlinks=Array.from(hyperlinks);

let paths=arrayOfHyperlinks.map(elm=>
    elm.getAttribute('href')
);

console.log(paths);

inputELm.value=paths;



sendButton.addEventListener('click',ev => {
   document.getElementById('form').submit();
});
//document.querySelector('ol').style.display='none';



