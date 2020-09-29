-- -----------------------------------------------------
-- Table grupo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS grupo (
  id_grupo SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  ds_grupo VARCHAR(30) NOT NULL,
  PRIMARY KEY (id_grupo)
);

-- -----------------------------------------------------
-- Table funcionario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS funcionario (
  id_funcionario SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  nm_funcionario VARCHAR(50) NOT NULL,
  dt_nascimento DATE NULL,
  cpf VARCHAR(11) NULL,
  email VARCHAR(50) NULL,
  login VARCHAR(50) NOT NULL,
  senha TEXT NOT NULL,
  PRIMARY KEY (id_funcionario)
);

-- -----------------------------------------------------
-- Table funcionario_grupo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS funcionario_grupo (
  id_funcionario_grupo SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  id_funcionario INT NULL,
  id_grupo INT NULL,
  PRIMARY KEY (id_funcionario_grupo),
  CONSTRAINT fk_funcionario_grupo_func
    FOREIGN KEY (id_funcionario)
    REFERENCES funcionario (id_funcionario)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT fk_funcionario_grupo_gp
    FOREIGN KEY (id_grupo)
    REFERENCES grupo (id_grupo)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

-- -----------------------------------------------------
-- Table setor
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS setor (
  id_setor SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  ds_setor VARCHAR(30) NOT NULL,
  PRIMARY KEY (id_setor)
);

-- -----------------------------------------------------
-- Table tipo_tarefa
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tipo_tarefa (
  id_tipo_tarefa SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  ds_tipo_tarefa VARCHAR(100) NOT NULL,
  id_setor INT NOT NULL,
  PRIMARY KEY (id_tipo_tarefa),
  CONSTRAINT fk_setor_tp_tarefa
    FOREIGN KEY (id_setor)
    REFERENCES setor (id_setor)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table tipo_tarefa_func
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tipo_tarefa_func (
  id_tipo_tarefa_func SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  id_tipo_tarefa INT NOT NULL,
  id_funcionario INT NOT NULL,
  PRIMARY KEY (id_tipo_tarefa_func),
  CONSTRAINT tipo_tarefa_func_fn
    FOREIGN KEY (id_funcionario)
    REFERENCES funcionario (id_funcionario)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT tipo_tarefa_func_tt
    FOREIGN KEY (id_tipo_tarefa)
    REFERENCES tipo_tarefa (id_tipo_tarefa)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table tipo_tarefa_grupo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tipo_tarefa_grupo (
  id_tipo_tarefa_grupo SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  id_tipo_tarefa INT NOT NULL,
  id_grupo INT NOT NULL,
  PRIMARY KEY (id_tipo_tarefa_grupo),
  CONSTRAINT tipo_tarefa_grupo_g
    FOREIGN KEY (id_grupo)
    REFERENCES grupo (id_grupo)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT tipo_tarefa_grupo_tt
    FOREIGN KEY (id_tipo_tarefa)
    REFERENCES tipo_tarefa (id_tipo_tarefa)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table aprovacao
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS aprovacao (
  id_aprovacao SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  ds_aprovacao VARCHAR(100) NOT NULL,
  id_tipo_tarefa INT NOT NULL,
  PRIMARY KEY (id_aprovacao),
  CONSTRAINT fk_aprovacao_tp_tarefa
    FOREIGN KEY (id_tipo_tarefa)
    REFERENCES tipo_tarefa (id_tipo_tarefa)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table aprovacao_grupo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS aprovacao_grupo (
  id_aprovacao_grupo SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  id_grupo INT NOT NULL,
  id_aprovacao INT NOT NULL,
  PRIMARY KEY (id_aprovacao_grupo),
  CONSTRAINT fk_aprovacao_grupo_g
    FOREIGN KEY (id_grupo)
    REFERENCES grupo (id_grupo)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_aprovacao_grupo_a
    FOREIGN KEY (id_aprovacao)
    REFERENCES aprovacao (id_aprovacao)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table aprovacao_funcionario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS aprovacao_funcionario (
  id_aprovacao_func SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  id_funcionario INT NOT NULL,
  id_aprovacao INT NOT NULL,
  PRIMARY KEY (id_aprovacao_func),
  CONSTRAINT fk_aprovacao_func_f
    FOREIGN KEY (id_funcionario)
    REFERENCES funcionario (id_funcionario)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_aprovacao_func_a
    FOREIGN KEY (id_aprovacao)
    REFERENCES aprovacao (id_aprovacao)
    ON DELETE CASCADE
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table status
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS status (
  id_status SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  ds_status VARCHAR(30) NOT NULL,
  PRIMARY KEY (id_status)
);

-- -----------------------------------------------------
-- Table solicitacao
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS solicitacao (
  id_solicitacao SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  titulo VARCHAR(100) NOT NULL,
  ds_solicitacao VARCHAR(1000) NOT NULL,
  id_status INT NOT NULL,
  id_tipo_tarefa INT NOT NULL,
  id_solicitador INT NOT NULL,
  id_executante INT NULL,
  PRIMARY KEY (id_solicitacao),
  CONSTRAINT fk_solicitacao_status
    FOREIGN KEY (id_status)
    REFERENCES status (id_status)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_solicitacao_tp_tarefa
    FOREIGN KEY (id_tipo_tarefa)
    REFERENCES tipo_tarefa (id_tipo_tarefa)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_solicitacao_solicitador
    FOREIGN KEY (id_solicitador)
    REFERENCES funcionario (id_funcionario)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_solicitacao_executante
    FOREIGN KEY (id_executante)
    REFERENCES funcionario (id_funcionario)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table solicitacao_aprovacao
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS solicitacao_aprovacao (
  id_solicitacao_aprovacao SERIAL NOT NULL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  id_aprovador INT NOT NULL,
  id_solicitacao INT NOT NULL,
  dt_aprovacao DATE NULL,
  PRIMARY KEY (id_solicitacao_aprovacao),
  CONSTRAINT fk_solicitacao_aprovacao_s
    FOREIGN KEY (id_solicitacao)
    REFERENCES solicitacao (id_solicitacao)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_solicitacao_aprovacao_a
    FOREIGN KEY (id_aprovador)
    REFERENCES aprovacao (id_aprovacao)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table solicitacao_log
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS solicitacao_log (
  id_solicitacao_log SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  log VARCHAR(100) NOT NULL,
  dt_log TIMESTAMP NOT NULL,
  id_solicitacao INT NOT NULL,
  PRIMARY KEY (id_solicitacao_log),
  CONSTRAINT fk_solicitacao_log
    FOREIGN KEY (id_solicitacao)
    REFERENCES solicitacao (id_solicitacao)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table solicitacao_tarefa
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS solicitacao_tarefa (
  id_solicitacao_tarefa SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  ds_solicitacao_tarefa VARCHAR(30) NOT NULL,
  id_executante INT NULL,
  id_solicitacao INT NOT NULL,
  id_status INT NOT NULL,
  observacao_execucao VARCHAR(4000) NULL,
  id_tarefa_pendencia INT NULL,
  PRIMARY KEY (id_solicitacao_tarefa),
  CONSTRAINT fk_solicitacao_tarefa_exe
    FOREIGN KEY (id_executante)
    REFERENCES funcionario (id_funcionario)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_solicitacao_tarefa_sol
    FOREIGN KEY (id_solicitacao)
    REFERENCES solicitacao (id_solicitacao)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_solicitacao_tarefa_status
    FOREIGN KEY (id_status)
    REFERENCES status (id_status)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table solicitacao_tarefa_anexo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS solicitacao_tarefa_anexo (
  id_solicitacao_tarefa_anexo SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  id_solicitacao_tarefa INT NOT NULL,
  ds_arquivo VARCHAR(200) NOT NULL,
  PRIMARY KEY (id_solicitacao_tarefa_anexo),
  CONSTRAINT fk_solicitacao_tarefa_anexo
    FOREIGN KEY (id_solicitacao_tarefa)
    REFERENCES solicitacao_tarefa (id_solicitacao_tarefa)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table solicitacao_tarefa_func
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS solicitacao_tarefa_func (
  id_solicitacao_tarefa_func SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  id_solicitacao_tarefa INT NOT NULL,
  id_funcionario INT NOT NULL,
  PRIMARY KEY (id_solicitacao_tarefa_func),
  CONSTRAINT fk_solicitacao_tarefa_func_f
    FOREIGN KEY (id_funcionario)
    REFERENCES funcionario (id_funcionario)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_solicitacao_tarefa_func_st
    FOREIGN KEY (id_solicitacao_tarefa)
    REFERENCES solicitacao_tarefa (id_solicitacao_tarefa)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table solicitacao_tarefa_grupo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS solicitacao_tarefa_grupo (
  id_solicitacao_tarefa_grupo SERIAL,
  dt_criacao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dt_atualizacao TIMESTAMP NULL,
  id_solicitacao_tarefa INT NOT NULL,
  id_grupo INT NOT NULL,
  PRIMARY KEY (id_solicitacao_tarefa_grupo),
  CONSTRAINT fk_solicitacao_tarefa_grupo_g
    FOREIGN KEY (id_grupo)
    REFERENCES grupo (id_grupo)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_solicitacao_tarefa_grupo_st
    FOREIGN KEY (id_solicitacao_tarefa)
    REFERENCES solicitacao_tarefa (id_solicitacao_tarefa)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

INSERT INTO funcionario(nm_funcionario, login, senha) VALUES('Administrador', 'admin', '86174a1eda360ba9ed9774f30c7d684a6e3290d18862d6c6a25a7cf1739673e8633427119facdd87f9fe2220a83e8563188a90b2f5eb1127eefb54c1a1906320lL1PHjmIUTiGOw09an2mP84PjHL7G7Q8TE4ln4VK23g=');