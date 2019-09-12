/*SCRIPTS CHILEDIRECTO*/
CREATE DATABASE CHILEDIRECTO;

/*CARGAR COMUNAS REGIONES Y PROVINCIAS DESDE ARCHIVO EXTERNO*/

CREATE 	TABLE PRECIO_KILOMETRO(
	ID_PRECIO_KILOMETRO	INT AUTO_INCREMENT NOT NULL PRIMARY KEY
,	KILOMETRO 			INT 			NOT NULL
, 	PRECIO 				INT 			NOT NULL	
);

CREATE	TABLE ESTADO(
	ID_ESTADO			INT AUTO_INCREMENT NOT NULL PRIMARY KEY
,	ESTADO 				VARCHAR(30)		NOT NULL
);	

CREATE TABLE TIPO_USUARIO(
	ID_TIPO_USUARIO		INT AUTO_INCREMENT NOT NULL PRIMARY KEY
,	TIPO_USUARIO 		VARCHAR(30)		NOT NULL
);

CREATE TABLE PERSONA(
    ID_PERSONA			INT AUTO_INCREMENT NOT NULL PRIMARY KEY
,	RUT					VARCHAR(9)	 	NOT NULL				
,	NOMBRES 			VARCHAR(150) 	NOT NULL
,	APELLIDO_PATERNO 	VARCHAR(100) 	NOT NULL
,	APELLIDO_MATERNO 	VARCHAR(100) 	NOT NULL
, 	CORREO 				VARCHAR(200) 	NOT NULL   
,	FONO				VARCHAR(20)	 	NOT NULL
);

CREATE TABLE USUARIO(
	ID_USUARIO			INT AUTO_INCREMENT NOT NULL PRIMARY KEY
,	NOMBRE_USUARIO		VARCHAR(30)		NOT NULL
,	CONTRASENA			VARCHAR(50)		
, 	ID_ESTADO			INT 			NOT NULL
,	ID_TIPO_USUARIO		INT 			NOT NULL
,	ID_PERSONA 			INT 			NOT NULL
, 	CONSTRAINT	FK_TIPO_USUARIO_USUARIO FOREIGN KEY(ID_TIPO_USUARIO)REFERENCES TIPO_USUARIO(ID_TIPO_USUARIO)
, 	CONSTRAINT	FK_PERSONA_USUARIO 		FOREIGN KEY(ID_PERSONA) 	REFERENCES PERSONA(ID_PERSONA)
);

CREATE 	TABLE PEDIDO(
	ID_PEDIDO 					INT AUTO_INCREMENT NOT NULL PRIMARY KEY
,	ID_USUARIO_CLIENTE			INT 			NOT NULL
,	ID_USUARIO_TRANSPORTISTA	INT 			NOT NULL
,	DIRECCION_INICIO 			VARCHAR(200) 	NOT NULL 
,	ID_COMUNA_INICIO			INT 			NOT NULL
, 	ID_REGION_INICIO    		INT			 	NOT NULL
,	ID_PROVINCIA_INICIO 		INT 		 	NOT NULL
,	DIRECCION_FIN 				VARCHAR(200) 	NOT NULL 
,	ID_COMUNA_FIN				INT 			NOT NULL
, 	ID_REGION_FIN   			INT			 	NOT NULL
,	ID_PROVINCIA_FIN 			INT 		 	NOT NULL  
,	CENTRO_COSTO				VARCHAR(100)	NOT NULL
,	PRECIO 						INT 			NOT NULL
,	FECHA_INGRESO 				VARCHAR(20)			
,	FECHA_CARGA					VARCHAR(20)
,	FECHA_RENDICION				VARCHAR(20)
,	CONSTRAINT	FK_USUARIO_CLIENTE_PEDIDO 			FOREIGN KEY(ID_USUARIO_CLIENTE) 				REFERENCES USUARIO(ID_USUARIO)
,	CONSTRAINT	FK_USUARIO_TRANSPORTISTA_PEDIDO 	FOREIGN KEY(ID_USUARIO_TRANSPORTISTA) 			REFERENCES USUARIO(ID_USUARIO)
, 	CONSTRAINT	FK_COMUNA_PEDIDO_INICIO 			FOREIGN KEY(ID_COMUNA_INICIO) 					REFERENCES COMUNA(ID)
, 	CONSTRAINT	FK_PROVINCIA_PEDIDO_INICIO 			FOREIGN KEY(ID_PROVINCIA_INICIO) 				REFERENCES PROVINCIA(ID)
, 	CONSTRAINT	FK_REGION_PEDIDO_INICIO 			FOREIGN KEY(ID_REGION_INICIO) 					REFERENCES REGION(ID)
, 	CONSTRAINT	FK_COMUNA_PEDIDO_FIN 				FOREIGN KEY(ID_COMUNA_FIN) 						REFERENCES COMUNA(ID)
, 	CONSTRAINT	FK_PROVINCIA_PEDIDO_FIN 			FOREIGN KEY(ID_PROVINCIA_FIN)	 				REFERENCES PROVINCIA(ID)
, 	CONSTRAINT	FK_REGION_PEDIDO_FIN 				FOREIGN KEY(ID_REGION_FIN)	 					REFERENCES REGION(ID)
);