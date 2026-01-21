import Link from "next/link";
import Image from "next/image";

type Course = {
  id: number;
  title: string;
  description: string;
  image: string;
  slug: string;
};

async function getCourses(): Promise<Course[]> {
  const res = await fetch("https://your-api-url.com/courses", {
    cache: "no-store", // SSR fresh data
  });

  if (!res.ok) {
    throw new Error("Failed to fetch courses");
  }

  return res.json();
}

export default async function Courses() {
  //   const courses = await getCourses();
  const courses = [
    {
      id: 1,
      title: "Advance Electrical Courses",
      description:
        "BES provides advanced electrical and electrical engineering training with practical exposure.",
      image: "/img/logo.png",
      slug: "advance-electrical-courses",
    },
    {
      id: 4,
      title: "Advance Electrical Courses",
      description:
        "BES provides advanced electrical and electrical engineering training with practical exposure.",
      image: "/img/logo.png",
      slug: "advance-electrical-courses",
    },
    {
      id: 2,
      title: "Automation & PLC SCADA",
      description:
        "Professional PLC, SCADA, and industrial automation training for engineers.",
      image: "/img/logo.png",
      slug: "plc-scada-courses",
    },
    {
      id: 3,
      title: "Civil & Primavera P6",
      description:
        "Learn Primavera P6, AutoCAD, and project planning for civil engineering.",
      image: "/img/logo.png",
      slug: "civil-primavera-courses",
    },
  ];

  return (
    <section className="py-5">
      <div className="container">
        {/* Top text */}
        <div className="text-center mb-5">
          <h2 className="fw-bold">Our Courses</h2>
          <p className="text-muted mt-3">
            BES is a Technical Training Institute in Lahore that is providing
            advance Autocad training course, Etap online training Course, Best
            primavera p6 training & PLC SCADA Course.
          </p>
        </div>

        {/* Course cards */}
        <div className="row justify-content-center g-4">
          {courses.map((course) => (
            <div key={course.id} className="col-md-4">
              <div className="card h-100 text-center shadow-sm border-0">
                {/* Image */}
                <Image
                  src={course.image}
                  alt={course.title}
                  width={400}
                  height={300}
                  className="card-img-top"
                />

                {/* Body */}
                <div className="card-body d-flex flex-column">
                  <h5 className="card-title fw-semibold">{course.title}</h5>

                  <p className="card-text text-muted">{course.description}</p>

                  {/* Button */}
                  <div className="mt-auto">
                    <Link
                      href={`/courses/${course.slug}`}
                      className="btn btn-outline-primary btn-sm"
                    >
                      All Courses
                    </Link>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
