export default function FAQ() {
  const faqs = [
    {
      id: 1,
      question: "What types of courses are offered by training institutes?",
      answer:
        "Training institutes offer a wide range of courses, including technical certifications, professional development programs, skill enhancement courses, Electrical Engineering Course and industry-specific training.",
    },
    {
      id: 2,
      question:
        "What qualifications do I need to enroll in a training institute?",
      answer:
        "Entry requirements vary for different courses and institutes. Some programs may have specific prerequisites, while others may be open to individuals with a certain educational background or work experience.",
    },
    {
      id: 3,
      question: "Are the courses offered online or in-person?",
      answer:
        "BES training institutes offer both online and in-person courses to accommodate different learning preferences and schedules.",
    },
    {
      id: 4,
      question: "How can I enroll in a course at a training institute?",
      answer:
        "You can visit the institute's website, fill out an application form, and follow the specified registration procedure.",
    },
  ];

  return (
    <section className="py-5 bg-primary">
      <div className="container">
        {/* Heading */}
        <div className="row mb-4">
          <div className="col text-center">
            <h2 className="fw-bold text-white">What are you looking for?</h2>
            <p className="text-white-50">
              Frequently asked questions about our training programs
            </p>
          </div>
        </div>

        {/* Accordion */}
        <div className="row justify-content-center">
          <div className="col-lg-9">
            <div className="accordion accordion-flush" id="faqAccordion">
              {faqs.map((faq, index) => (
                <div
                  className="accordion-item mb-3 rounded shadow-sm"
                  key={faq.id}
                >
                  <h2 className="accordion-header">
                    <button
                      className={`accordion-button fw-semibold ${
                        index !== 0 ? "collapsed" : ""
                      }`}
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target={`#faq-${faq.id}`}
                      aria-expanded={index === 0}
                    >
                      {faq.question}
                    </button>
                  </h2>

                  <div
                    id={`faq-${faq.id}`}
                    className={`accordion-collapse collapse ${
                      index === 0 ? "show" : ""
                    }`}
                    data-bs-parent="#faqAccordion"
                  >
                    <div className="accordion-body text-muted">
                      {faq.answer}
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
