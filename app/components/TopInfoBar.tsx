import Link from "next/link";

export default function TopInfoBar() {
  return (
    <div className="top-info-bar d-none d-lg-block bg-primary text-white py-3">
      <div className="container">
        <div className="row align-items-center">
          {/* Left: Bootcamps */}
          <div className="col d-flex justify-content-start">
            <Link
              href="/bootcamp"
              className="btn btn-sm btn-light fw-semibold text-primary"
            >
              Bootcamps
            </Link>
          </div>

          {/* Center: Contact info */}
          <div className="col d-flex justify-content-center" style={{'min-width': '459px'}}>
            <ul className="list-inline mb-0 d-flex gap-4">
              {/* Phone */}
              <li className="list-inline-item d-flex align-items-center gap-2">
                <i className="fa fa-phone"></i>
                <span>0317-1170280 | 0317-1170281</span>
              </li>

              <li className="list-inline-item d-flex align-items-center gap-2">
                <i className="fa fa-envelope"></i>
                <span>burraq@burraq.org</span>
              </li>
            </ul>
          </div>

          {/* Right: Enroll */}
          <div className="col d-flex justify-content-end">
            <Link
              href="/contact"
              className="btn btn-sm btn-light fw-semibold text-primary"
            >
              Enroll Now
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
}
