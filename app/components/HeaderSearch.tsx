
export default function HeaderSearch() {
return (
<form className="d-flex" role="search">
  <input
    className="form-control me-2 rounded-pill"
    type="search"
    placeholder="Search Course"
    aria-label="Search"
  />
  <button className="btn btn-dark rounded-pill" type="submit">
    Search
  </button>
</form>
);
}