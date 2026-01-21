
export default function HeroSearch() {
    {/* Hero Section */}
return (
      <div
        className="position-relative w-100"
        style={{ height: "500px", backgroundColor: "#004aad" }}
      >
        <div className="container h-100 d-flex flex-column justify-content-center align-items-center text-center text-white">
          <h1 className="display-4 fw-bold">Welcome to MyApp</h1>
          <p className="lead">Find the best courses for your career</p>
          <form className="d-flex w-50 mt-3">
            <input
              type="text"
              className="form-control me-2 rounded-pill"
              placeholder="Search Course"
            />
            <button className="btn btn-light rounded-pill" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
);
}