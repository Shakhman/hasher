import axios from 'axios';

const url = 'api/users_hashes/';

function create(data) {
    return new Promise((resolve, reject) => {
        return axios.post(`${url}`, data)
            .then(response => {
                resolve(response);
            })
            .catch(error => {
                reject(error);
            });
    });
}

function getUserHashes() {
    return new Promise((resolve, reject) => {
        return axios.get(`${url}user`)
            .then(response => {
                resolve(response);
            })
            .catch(error => {
                reject(error);
            });
    });
}

export { create, getUserHashes }
