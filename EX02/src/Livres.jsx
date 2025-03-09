import { createStore } from "redux";
import { Provider, useDispatch, useSelector } from "react-redux";

import "bootstrap/dist/css/bootstrap.css";

// Initial State
const initialState = {
  livres: [
    {
      title: "RESTful Java Web Services",
      author: "David U",
      edition: "Packt",
      poster: "./livre1.png",
      likes: 0,
    },
    {
      title: "REST API Development with Node.js",
      author: "Fernando Doglio",
      edition: "Apress",
      poster: "./livre2.png",
      likes: 0,
    },
    {
      title: "RESTful Web Services Cookbook",
      author: "Subbu Allamaraju",
      edition: "O'REILLY",
      poster: "./livre3.png",
      likes: 0,
    },
  ],
};

// Reducer
const livreReducer = (state = initialState, action) => {
  switch (action.type) {
    case "INCREMENT_LIKE":
      const livres = state.livres.map((livre, index) =>
        index === action.payload ? { ...livre, likes: livre.likes + 1 } : livre
      );
      return { ...state, livres };

    default:
      return state;
  }
};


const store = createStore(livreReducer);

const LivreCard = ({ title, author, edition, poster, likes, index }) => {
  const dispatch = useDispatch();
  const handleLike = () => {
    dispatch({ type: "INCREMENT_LIKE", payload: index });
  };

  return (
    <div className="card col-4 mr-1">
      <img src={poster} alt={title} className="card-img-top" />
      <div className="card-body">
        <h5 className="card-title">{title}</h5>
        <p className="card-text">Author: {author}</p>
        <p className="card-text">Edition: {edition}</p>
        <button className="btn btn-primary" onClick={handleLike}>
          Likes ({likes})
        </button>
      </div>
    </div>
  );
};

// LivresInfo Component
const LivresInfo = () => {
  const livres = useSelector((state) => state.livres);

  return (
    <div className="container py-4">
      <div className="row">
        {livres.map((livre, index) => (
          <LivreCard key={index} {...livre} index={index} />
        ))}
      </div>
    </div>
  );
};

function Livres() {
  return (
    <Provider store={store}>
      <LivresInfo />
    </Provider>
  );
}

export default Livres;
