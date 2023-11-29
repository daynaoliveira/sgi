import { Link } from 'react-router-dom';
import forgotPassword from '../assets/images/forgot_password.svg';
import { FaEnvelope, FaPaperPlane } from 'react-icons/fa';

function RetrievePassword() {
    return (
        <div className="container">
            <div className="panel-container">
                <div className="content">
                    <img src={forgotPassword} alt="Esqueceu sua senha?" className='image' />
                </div>
            </div>
            <div className="form-container">
                <h1 className="title">SGI</h1>
                <h3 className="subtitle">Informe seu e-mail para <br /> redefinição de senha</h3>
                <form action="#" className="signin-form">
                    <div className="input-field">
                        <span className='input-icon'>
                            <FaEnvelope />
                        </span>
                        <input type="email" name="email" placeholder='example@mail.com' />
                    </div>
                    <div className="button-field">
                        <button type="submit" className='button-login'>
                            <span className='button-icon'>
                                <FaPaperPlane />
                            </span>
                            <span className='button-text'>Enviar</span>
                        </button>
                    </div>
                    <Link to='/login' className="redir" id="retrieve-password">Voltar</Link>
                </form>
            </div>
        </div>
    );
}

export default RetrievePassword;