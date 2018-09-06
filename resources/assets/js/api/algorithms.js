import axios from 'axios';

const url = 'api/algorithms/';

function getAll() {
    return new Promise((resolve, reject) => {
        return axios.get(`${url}`, )
            .then(response => {
                resolve(response);
            })
            .catch(error => {
                reject(error);
            });
    });
}

export { getAll }
