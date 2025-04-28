import { useState } from 'react';
import slogans from './slogans.json';

function App() {
  const [search, setSearch] = useState('');
  const [category, setCategory] = useState('All');
  const [copiedId, setCopiedId] = useState(null);

  const filteredSlogans = slogans.filter((slogan) =>
    (category === 'All' || slogan.category === category) &&
    (slogan.tamil.includes(search) || slogan.english.toLowerCase().includes(search.toLowerCase()))
  );

  const handleCopy = (text, id) => {
    navigator.clipboard.writeText(text);
    setCopiedId(id);
    setTimeout(() => setCopiedId(null), 1000);
  };

  return (
    <div className="p-4 max-w-3xl mx-auto">
      <h1 className="text-2xl font-bold mb-4">Slogans App (Tamil + English)</h1>
      <input
        type="text"
        placeholder="Search slogans..."
        value={search}
        onChange={(e) => setSearch(e.target.value)}
        className="border p-2 w-full mb-4 rounded"
      />
      <select
        value={category}
        onChange={(e) => setCategory(e.target.value)}
        className="border p-2 w-full mb-4 rounded"
      >
        <option value="All">All</option>
        <option value="Motivational">Motivational</option>
        <option value="Love">Love</option>
        <option value="Friendship">Friendship</option>
        <option value="Life">Life</option>
      </select>
      {filteredSlogans.map((slogan) => (
        <div key={slogan.id} className="border p-4 mb-2 rounded shadow flex justify-between items-center">
          <div>
            <div className="font-bold">{slogan.tamil}</div>
            <div className="text-gray-600">{slogan.english}</div>
            <div className="text-sm text-blue-500">{slogan.category}</div>
          </div>
          <button
            onClick={() => handleCopy(`${slogan.tamil} - ${slogan.english}`, slogan.id)}
            className="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded"
          >
            {copiedId === slogan.id ? "Copied!" : "Copy"}
          </button>
        </div>
      ))}
    </div>
  );
}

export default App;