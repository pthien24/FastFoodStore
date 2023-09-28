import axios from "axios";
const url = {
  baseUrl: "http://127.0.0.1:8000/api",
  product: "/products",
  category: "/category",
};
const instance = axios.create({
  baseURL: url.baseUrl,
  headers: {
    "content-type": "application/json",
    Accept: "application/json",
  },
});

const api = {
  url,
  get: instance.get,
  post: instance.post,
  put: instance.put,
  delete: instance.delete,
  patch: instance.patch,
};
export default api;
