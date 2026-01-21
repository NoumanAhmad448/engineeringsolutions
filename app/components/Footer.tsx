import ClientBootstrap from "./ClientBootstrap";
import Image from "next/image";

export default function Footer() {
  return (
    <footer className="border-t bg-white">
      <div className="bg-dark text-light pt-5">
        <div className="container">
        <div className="row gy-4">

          {/* Column 1: Logo + Description */}
          <div className="col-md-4">
            <Image
              src="/img/logo.png" // place logo in public/img
              alt="Burraq Engineering Solutions"
              width={100}
              height={100}
              className="mb-3"
            />
            <p className="small fw-semibold">
              Burraq Engineering Solutions is a Technical Training Institute in
              Lahore providing services and training in Electrical Automation,
              Electrical Engineering, and IT fields.
            </p>
          </div>

          {/* Column 2: Office Info */}
          <div className="col-md-4">
            <h5 className="fw-bold mb-3">Main Office</h5>
            <ul className="list-unstyled small">
              <li className="mb-2">
                <i className="fa fa-phone me-2"></i>
                <strong>0317-1170280</strong>
              </li>
              <li className="mb-2">
                <i className="fa fa-envelope me-2"></i>
                <strong>burraq@burraq.org</strong>
              </li>
              <li className="mb-2">
                <i className="fa fa-clock-o me-2"></i>
                <strong>MON–SAT 09:00 – 21:00</strong>
              </li>
              <li>
                <i className="fa fa-map-marker me-2"></i>
                <strong>
                  23 B Wahdat Road Near Abrar Center, Lahore
                </strong>
              </li>
            </ul>
          </div>

          {/* Column 3: Google Map */}
          <div className="col-md-4">
            <h5 className="fw-bold mb-3">Find Us</h5>
            <div className="ratio ratio-16x9 rounded overflow-hidden">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d54417.59668128491!2d74.325567!3d31.521419000000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919037adfcf470b%3A0x42b9f208cedbc3b9!2sBurraq%20Engineering%20Solutions!5e0!3m2!1sen!2sus!4v1691829487071!5m2!1sen!2sus"
                loading="lazy"
                referrerPolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>

        </div>

        {/* Bottom bar */}
        <hr className="border-secondary my-4" />
        <div className="text-center small pb-3">
          © {new Date().getFullYear()} Burraq Engineering Solutions. All Rights Reserved.
        </div>
      </div>
      </div>
      <ClientBootstrap />

    </footer>
  );
}
