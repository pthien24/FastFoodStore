type ResponseWrapper<T> = {
  status: number;
  message: string;
  data: T;
  last_page: number;
};
export default ResponseWrapper;
