import Link from "next/link";

export default function CoursesList() {
  const courseGroups = [
    {
      title: "Best Course",
      courses: [
        "3D Max Training course",
        "Advance Electrical Courses",
        "AutoCad Electrical Training",
        "Business Development Training",
      ],
    },
    {
      title: "Trending Courses",
      courses: [
        "Learn AutoCAD 2D & 3D",
        "Lean Six Sigma for IT sector",
        "Revit Architecture Course",
        "Lean Six Sigma Black Belt",
      ],
    },
    {
      title: "Discounted Courses",
      courses: [
        "Solar Panel Courses online",
        "Complete Electrical Design Course",
        "Etap online training Course",
        "PLC online Course",
      ],
    },
  ];

  return (
    <section className="py-5 bg-light">
      <div className="container">
        {/* Section Header */}
        <div className="row justify-content-center mb-4">
          <div className="col-lg-10 text-center">
            <h2 className="fw-bold">Explore Our Courses</h2>
            <p className="text-muted">
              Find the perfect course for your career journey
            </p>
          </div>
        </div>

        <div className="row gy-4">
          {courseGroups.map((group) => (
            <div key={group.title} className="col-md-6 col-lg-4">
              <div className="card h-100 shadow-sm border-0">
                <div className="card-body">
                  <h5 className="card-title fw-semibold mb-3">{group.title}</h5>
                  <ul className="list-unstyled">
                    {group.courses.map((course) => (
                      <li
                        key={course}
                        className="d-flex align-items-center mb-2"
                      >
                        <span className="me-2 text-primary">•</span>
                        <Link
                          href="#"
                          className="text-decoration-none text-dark"
                        >
                          {course}
                        </Link>
                      </li>
                    ))}
                  </ul>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
