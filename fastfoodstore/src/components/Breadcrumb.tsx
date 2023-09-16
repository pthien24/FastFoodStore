import * as React from "react";
interface Props {
  title: string;
}
const Breadcrumb: React.FC<Props> = ({ title }) => {
  return (
    <div className="breadcrumb-section breadcrumb-bg">
      <div className="container">
        <div className="row">
          <div className="col-lg-8 offset-lg-2 text-center">
            <div className="breadcrumb-text">
              <h1>{title}</h1>
              <div className="hero-btns">
                <a href="index_2.html" className="boxed-btn">
                  Quay Về Trang Chủ
                </a>
                <a href="contact.html" className="bordered-btn">
                  Liên hệ
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Breadcrumb;
