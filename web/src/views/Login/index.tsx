import React from 'react';
import { Link } from 'react-router-dom';
import logoImg from '../../assets/images/medical_research.svg';
import './style.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faIdCard } from '@fortawesome/free-regular-svg-icons';
import { faUnlockKeyhole } from '@fortawesome/free-solid-svg-icons';
import { faArrowRightToBracket } from '@fortawesome/free-solid-svg-icons';

function Login(){
    return(
        <div id="page-login">
            <div className="container">
                <div className="form-container">
                    <div className="signin">
                        <h1 className="title">SGI - Login</h1>
                        <h3 className="subtitle">Colaborador</h3>
                        <form action="#" className="signin-form">
                            
                            <div className="input-field">
                                <i>
                                    <FontAwesomeIcon icon={faIdCard} />
                                </i>
                                <input type="text" name='cpf' placeholder='000.000.000-00'/>
                            </div>
                            <div className="input-field">
                                <i>
                                    <FontAwesomeIcon icon={faUnlockKeyhole} />
                                </i>
                                <input type="password" placeholder='********'/>
                            </div>
                            <Link to='/retrieve-password' className="redir" id="retrieve-password">Esqueceu sua senha?</Link>
                            <div className="button-field">
                                <button type="submit" className='btn-login'>
                                    <span className='button-icon'>
                                        <i>
                                            <FontAwesomeIcon icon={faArrowRightToBracket} />
                                        </i>
                                    </span>
                                    <span className='button-text'>Login</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div className="panel-container">
                    <div className="panel left-panel">
                        <div className="content">
                            <h3>Bem vindo!</h3>
                            <p>Faça login para acessar as funcionalidades do sistema</p>
                            <img src={logoImg} alt="Logo" className='image' />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Login;