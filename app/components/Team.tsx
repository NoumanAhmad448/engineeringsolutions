import Image from "next/image";
import { TeamMember } from "../types/team";

type TeamMember = {
  id: number;
  name: string;
  title: string;
  image: string;
};

interface TeamProps {
  members: TeamMember[];
}

export default function Team() {
  // Hardcoded team data
  const members: TeamMember[] = [
    {
      id: 1,
      name: "Ali Khan",
      title: "Project Leader",
      image: "/img/logo.png",
    },
    {
      id: 2,
      name: "Ayesha Malik",
      title: "Project Leader",
      image: "/img/team/ayesha.png",
    },
    {
      id: 3,
      name: "Sara Ahmed",
      title: "Senior Engineer",
      image: "/img/team/sara.png",
    },
    {
      id: 4,
      name: "Usman Riaz",
      title: "Junior Engineer",
      image: "/img/team/usman.png",
    },
    {
      id: 5,
      name: "Bilal Shah",
      title: "Electrical Engineer",
      image: "/img/team/bilal.png",
    },
  ];
  // Separate leaders and others
  const leaders = members.filter((m) =>
    m.title.toLowerCase().includes("leader"),
  );
  const others = members.filter(
    (m) => !m.title.toLowerCase().includes("leader"),
  );

  return (
    <section className="py-5 bg-light">
      <div className="container">
        {/* Section header */}
        <div className="row justify-content-center mb-5">
          <div className="col-lg-10 text-center">
            <h2 className="fw-bold mb-3">Our Team</h2>
            <p className="text-muted fs-5">
              Meet the professionals driving BES forward
            </p>
          </div>
        </div>

        {/* Leaders row */}
        {leaders.length > 0 && (
          <div className="row justify-content-center mb-4">
            {leaders.map((member) => (
              <div key={member.id} className="col-md-4 col-lg-3 mb-4">
                <div className="card border-0 shadow-sm text-center h-100">
                  <Image
                    src={member.image}
                    alt={member.name}
                    width={200}
                    height={200}
                    className="rounded-circle mt-3 mx-auto"
                  />
                  <div className="card-body">
                    <h5 className="card-title fw-semibold">{member.name}</h5>
                    <p className="card-text text-muted">{member.title}</p>
                  </div>
                </div>
              </div>
            ))}
          </div>
        )}

        {/* Rest of the team */}
        {others.length > 0 && (
          <div className="row justify-content-center">
            {others.map((member) => (
              <div key={member.id} className="col-md-3 col-lg-2 mb-4">
                <div className="card border-0 shadow-sm text-center h-100">
                  <Image
                    src={member.image}
                    alt={member.name}
                    width={150}
                    height={150}
                    className="rounded-circle mt-3 mx-auto"
                  />
                  <div className="card-body">
                    <h6 className="card-title fw-semibold">{member.name}</h6>
                    <p className="card-text text-muted">{member.title}</p>
                  </div>
                </div>
              </div>
            ))}
          </div>
        )}
      </div>
    </section>
  );
}
