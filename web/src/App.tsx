import React from 'react';
import './assets/styles/global.css';
import Rotas from './routes';

/*interface TituloProps{
	text: string
}

function Titulo(props: TituloProps){
	return(
		<h1>{props.text}</h1>
	)
}*/



function App() {
	return (
		<div className="App">
			<Rotas />
			{ /*<Titulo text="titulo 1"/>
			<Titulo text="titulo 2"/>
			<header className="App-header">
				<img src={logo} className="App-logo" alt="logo" />
				<p>
					Edit <code>src/App.tsx</code> and save to reload.
				</p>
				<a className="App-link" href="https://reactjs.org" target="_blank" rel="noopener noreferrer">
					Learn React
				</a>
			</header>*/ }
		</div>
	);
}

export default App;