// function getGet(name) {
//     var result = null, tmp = [];
//     location.search.substr(1).split("&").forEach(function (item) {
//         tmp = item.split("=");
//         if (tmp[0] === name) {
//             result = tmp[0] + '=' + decodeURIComponent(tmp[1]);
//         }
//     });
//     return result;
// }
// alert(getGet('_ijt'));