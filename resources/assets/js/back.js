import axios from "axios";

// axios.post('/cart/add', {
//     'product_id': 3,
//     'quantity': 1,
// }, {
//     headers: {
//         'Content-Type': 'application/json',
//         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
//     }
// })
//     .then(function (response) {
//         console.log(response.data);
//     })
//     .catch(function (error) {
//         let errorMsg = '';
//
//         if (error.response) {
//             errorMsg = error.response.data.message;
//         } else if (error.request) {
//             errorMsg = error.request;
//         } else {
//             errorMsg = error.message;
//         }
//
//         console.error(errorMsg);
//     });
