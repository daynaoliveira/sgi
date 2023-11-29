import { Link } from 'react-router-dom';
import logoImg from '../assets/images/medical_research.svg';
import '../styles/login.css';
import { FaIdCard, FaUnlockAlt, FaSignInAlt } from 'react-icons/fa';

function Login(){
    return(
        <div className="container">
            <div className="panel-container">
                <div className="content">
                    <h3>Bem vindo!</h3>
                    <p>Faça login para acessar as funcionalidades do sistema</p>
                    <img src={logoImg} alt="Pesquisa médica" className='image' />
                </div>
            </div>
            <div className="form-container">
                <h1 className="title">SGI - Login</h1>
                <h3 className="subtitle">Colaborador</h3>
                <form action="#" className="signin-form">
                    <div className="input-field">
                        <span className='input-icon'>
                            <FaIdCard />
                        </span>
                        <input type="text" name='cpf' placeholder='000.000.000-00'/>
                    </div>
                    <div className="input-field">
                        <span className='input-icon'>
                            <FaUnlockAlt />
                        </span>
                        <input type="password" placeholder='●●●●●●●●'/>
                    </div>
                    <Link to='/retrieve-password' className="redir" id="retrieve-password">Esqueceu sua senha?</Link>
                    <div className="button-field">
                        <button type="submit" className='button-login'>
                            <span className='button-icon'>
                                <FaSignInAlt />
                            </span>
                            <span className='button-text'>Login</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    );
}

export default Login;