export default function AboutBES() {
  return (
    <section className="py-5 bg-primary">
      <div className="container">

        {/* Section header */}
        <div className="row justify-content-center mb-4">
          <div className="col-lg-10 text-center text-white">
            <h2 className="fw-bold mb-3">Burraq Engineering Solutions</h2>
            <p className="fs-5 fw-semibold">
              A Trusted Name in Automation & Electrical Training
            </p>
          </div>
        </div>

        {/* Main content centered in a card */}
        <div className="row justify-content-center">
          <div className="col-lg-10">

            <div className="card shadow-lg border-0">
              <div className="card-body p-5">

                {/* Highlight statement */}
                <div className="p-4 mb-4 border-start border-4 border-primary bg-light rounded">
                  <p className="mb-0 fs-5 fw-semibold text-dark text-center">
                    BES is a Technical Training Institute providing professional
                    training services in the fields of Automation and Short Electrical Courses.
                  </p>
                </div>

                {/* Detailed description */}
                <p className="text-muted mb-0" style={{ lineHeight: "1.8" }}>
                  Burraq Engineering Solutions specializes in electrical automation
                  and electrical engineering training. With over{" "}
                  <strong className="text-dark">8 years of industry experience</strong>,
                  we have proudly trained professionals from some of the most
                  respected organizations in Pakistan, including{" "}
                  <strong className="text-dark">
                    IDAP, PAK NAVY, Pakistan Atomic Energy Commission,
                    Fatima Group of Fertilizers, COMSATS, UOL, and UCP
                  </strong>.
                  <br /><br />
                  Our mission is not only to train new engineers but also to
                  strengthen the engineering capabilities of our country by
                  delivering industry-ready skills and practical knowledge.
                </p>

              </div>
            </div>

          </div>
        </div>

      </div>
    </section>
  );
}
