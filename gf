






CREATE TABLE AboutHospital(
	ID int NOT NULL,
	Name varchar(500) NULL,
	Path varchar(500) NULL,
	Alarm varchar(500) NULL,
	Mail varchar(250) NULL,
	Tele varchar(11) NULL,
	Address varchar(500) NULL,
	Printoption varchar(50) NULL,
	MailPath varchar(1050) NULL
);

CREATE TABLE ActionDetails(
	ID int NOT NULL,
	workID int NULL,
	Customer_ID int NULL,
	GNumber int NULL,
	Gname varchar(100) NULL,
	Gdate date NULL,
	place varchar(200) NULL,
	lowerID int NULL);


CREATE TABLE AdminWorks(
	AdminWorkID int NOT NULL,
	AdminWorkName varchar(200) NULL);

CREATE TABLE Advocacy(
	ID int NOT NULL,
	AdvocacyName varchar(100) NULL,
	IssuesID int NULL,
	date_add date NULL,
	source varchar(100) NULL,
	text varchar(500) NULL);

CREATE TABLE Assets(
	AssetsID int NOT NULL,
	AssetsName varchar(200) NULL);
CREATE TABLE AssetsAccounts(
	ID int NOT NULL,
	TransDate date NULL,
	AssestName varchar(200) NULL,
	AssetsID int NULL,
	Employee_ID int NULL,
	value numeric(18, 2) NULL,
	supplier varchar(200) NULL,
	startDate date NULL,
	Notes varchar(200) NULL);

CREATE TABLE BusinessAdmin(
	ID int NOT NULL,
	receivedate date NULL,
	Employee_ID int NULL,
	Customer_ID int NULL,
	procurID int NULL,
	procurtype varchar(100) NULL,
	gehaName varchar(100) NULL,
	startdate date NULL,
	total decimal(18, 3) NULL,
	AdminWorkID int NULL,
	Gehaofsubject varchar(500) NULL,
	gehaaddress varchar(500) NULL,
	subject varchar(500) NULL);



CREATE TABLE BusinessFees(
	transID int NOT NULL,
	ID int NULL,
	transDate date NULL,
	Employee_ID int NULL,
	Customer_ID int NULL,
	totalFees decimal(18, 3) NULL,
	installNum int NULL,
	PaidFees decimal(18, 3) NULL,
	remainfees decimal(18, 3) NULL,
	notes varchar(500) NULL,
	transdatails varchar(500) NULL);

CREATE TABLE Causes(
	File_Nuumber int NOT NULL,
	File_Date datetime NULL,
	Cause_Number int NULL,
	Causeyear varchar(6) NULL,
	Cause_Date date NULL,
	IssuesID int NULL,
	Employee_ID int NULL,
	Customer_ID int NULL,
	Clients_charID int NULL,
	procurID int NULL,
	KhasmName varchar(200) NULL,
	Khasmmobile varchar(50) NULL,
	KhasmPhone varchar(50) NULL,
	KhasmAddress varchar(300) NULL,
	Khasmemail varchar(200) NULL,
	Khasm_charID int NULL,
	litigationDegID int NULL,
	courtID int NULL,
	Court_Address varchar(300) NULL,
	Circle_Name varchar(200) NULL,
	Cause_Subject varchar(2000) NULL,
	Qed_date date NULL,
	Total_Value numeric(18, 2) NULL);




CREATE TABLE Causes_Experts(
	File_Number int NULL,
	Expert_id int NULL,
	ExpertName varchar(500) NULL,
	Cause_Number int NULL,
	Causeyear varchar(6) NULL,
	Deliver_Date date NULL,
	Employee_ID int NULL,
	Note varchar(500) NULL,
	Visit_date date NULL
);



CREATE TABLE Causes_Galsa(
	File_Number int NOT NULL,
	Cause_Number int NOT NULL,
	Causeyear varchar(6) NULL,
	Galsa_Code int NOT NULL,
	Galsa_Number int NOT NULL,
	Galsa_Date date NOT NULL,
	Paper_Number varchar(150) NULL,
	Employee_ID int NULL,
	courtID int NULL,
	Role_Number int NULL,
	Court_Decision varchar(500) NULL,
	Requird varchar(500) NULL,
	Note varchar(500) NULL
);
CREATE TABLE Causes_Kafala(
	File_Number int NOT NULL,
	Cause_Number int NOT NULL,
	Causeyear varchar(6) NULL,
	Kafala_Number int NOT NULL,
	Kafala_Value numeric(18, 2) NULL,
	Qasema_Number int NULL,
	Paper_Number varchar(50) NULL,
	Pay_Date date NULL,
	Hokme varchar(500) NULL,
	Note varchar(500) NULL
);




CREATE TABLE Causes_Mohder(
	File_Number int NULL,
	Mohder_number int NOT NULL,
	Cause_Number int NULL,
	Causeyear varchar(6) NULL,
	Mohder_pen varchar(500) NULL,
	Deliver_Date date NULL,
	Galsa_Date date NULL,
	Employee_ID int NULL,
	Note varchar(500) NULL
);
CREATE TABLE Causes_Pays(
	Trans_ID int NOT NULL,
	File_Number int NOT NULL,
	Cause_Number int NOT NULL,
	Causeyear varchar(6) NULL,
	Trans_Date date NOT NULL,
	Employee_ID int NULL,
	Total_Value numeric(18, 2) NULL,
	Paied numeric(18, 2) NULL,
	Dofaa int NULL,
	Bayan varchar(500) NULL,
	Note varchar(500) NULL);




CREATE TABLE CausesCases(
	ID int NOT NULL,
	File_Number int NOT NULL,
	Cause_Number int NOT NULL,
	Causeyear varchar(6) NULL,
	IssuStateID int NOT NULL,
	isuueReasonsID int NULL,
	Employee_ID int NULL,
	Note varchar(500) NULL,
	ArshefNumber varchar(50) NOT NULL);



CREATE TABLE CausesFolders(
	File_Number int NOT NULL,
	Cause_Number int NOT NULL,
	Causeyear varchar(6) NULL,
	Folder_Number int NOT NULL,
	Folder_date date NULL,
	Folder_Name varchar(1000) NULL,
	Folder_desc varchar(500) NULL,
	Folder_Path varchar(500) NULL
);
CREATE TABLE Clients_char(
	Clients_charID int NOT NULL,
	Clients_charName varchar(500) NULL);

CREATE TABLE Consultion(
	ConsultID int NOT NULL,
	ConsultName varchar(500) NULL);

CREATE TABLE Courts(
	courtID int NOT NULL,
	courtName varchar(100) NULL);

CREATE TABLE Customer(
	Customer_ID int NOT NULL,
	Customer_name varchar(100) NULL,
	Mobile varchar(100) NULL,
	Tele varchar(100) NULL,
	Address varchar(100) NULL,
	Email varchar(100) NULL,
	NationalityID int NULL,
	Religion varchar(50) NULL);




CREATE TABLE Customerhistory(
	Employee_ID int NULL,
	Employee_Name varchar(100) NULL,
	File_Nuumber int NULL,
	Causeyear varchar(6) NULL,
	Customer_ID int NULL,
	Cause_Number int NULL
);

CREATE TABLE CustomerPurcur(
	IDD int  NOT NULL,
	ID int NOT NULL,
	Customer_ID int NULL,
	purcurDate date NULL,
	procurID int NULL,
	GehaName varchar(150) NULL,
	DocDate date NULL,
	notes varchar(200) NULL,
	Path varchar(500) NULL);

CREATE TABLE DailyTasks(
	TaskID int NOT NULL,
	RecieveDate date NULL,
	Employee_ID int NULL,
	Customer_ID int NULL,
	startDate date NULL,
	LowerID int NULL,
	taskDetails varchar(500) NULL,
	GehaName varchar(500) NULL,
	GehaAddress varchar(500) NULL);


CREATE TABLE Documents(
	DocID int NOT NULL,
	savedate date NULL,
	DocName varchar(500) NULL,
	DocDetails varchar(500) NULL,
	DocPath varchar(500) NULL);
CREATE TABLE   Employee (
	 Employee_ID   int  NOT NULL,
	 Employee_Name    varchar (100) NULL,
	 Mobile1    varchar (50) NULL,
	 Mobile2    varchar (50) NULL,
	 Profile_ID   int  NULL,
	 Address    varchar (3000) NULL,
	 qualification    varchar (100) NULL,
	 job    varchar (100) NULL,
	 StartDate   date  NOT NULL,
	 USERNAME    varchar (100) NULL,
	 Password    varchar (100) NULL,
	 Active   bit  NULL
	 );

CREATE TABLE   Expenses (
	 ID   int  NOT NULL,
	 ExpDate   date  NULL,
	 Supplier_ID   int  NULL,
	 Employee_ID   int  NULL,
	 Info    varchar (200) NULL,
	 total   numeric (18, 2) NULL,
	 Paid   numeric (18, 2) NULL,
	 EXType    varchar (12) NULL
	 );

CREATE TABLE   FeesTrans (
	 transID   int  NOT NULL,
	 LegelAdvID   int  NOT NULL,
	 transDate   date  NULL,
	 Employee_ID   int  NULL,
	 totalFees   decimal (18, 3) NULL,
	 installNum   int  NOT NULL,
	 PaidFees   decimal (18, 3) NULL,
	 remainfees   decimal (18, 3) NULL,
	 transdatails    varchar (500) NULL,
	 notes    varchar (500) NULL 
 );
CREATE TABLE   Forms (
	 Form_tag   int  NOT NULL,
	 Form_name    varchar (500) NULL,
	 Form_Source    varchar (500) NULL,
	 App_ID   int  NULL
);
CREATE TABLE   Functions_Forms (
	 Function_ID   int  NOT NULL,
	 Form_ID   int  NOT NULL,
	 Function_name    varchar (50) NULL);
CREATE TABLE   Galsa_Alarm (
	 ID   int  NOT NULL,
	 Galsa_ID   int  NOT NULL,
	 Alarm_time    varchar (50) NULL,
	 Alarm_date   date  NULL,
	 Alarm   bit  NULL
);
CREATE TABLE   Hokemtanfeez (
	 File_Number   int  NULL,
	 Cause_Number   int  NULL,
	 Causeyear   varchar (6) NULL,
	 Estenaf_Number   int  NULL,
	 Haser_Number   int  NULL,
	 TanfeezCircle    varchar (2000) NULL,
	 Hokem_date   date  NULL,
	 Judge_Name    varchar (1000) NULL,
	 courtID   int  NULL,
	 CenterName    varchar (1000) NULL,
	 Hokemsay    varchar ( 500) NULL
);
CREATE TABLE   HomeMenu (
	 ID   bigint  NULL,
	 name    varchar (100) NULL,
	 HeaderText    varchar (100) NULL,
	 IsForm   bit  NULL,
	 Form_Tag   bigint  NULL,
	 Parent   bigint  NULL
);
CREATE TABLE   Issues (
	 IssuesID   int  NOT NULL,
	 IssuesName    varchar (500) NULL
 );
CREATE TABLE   IssuState (
	 IssuStateID   int  NOT NULL,
	 IssuStateName    varchar (100) NULL
);
CREATE TABLE   IsuueReasons (
	 IssuStateID   int  NULL,
	 isuueReasonsID   int  NULL,
	 isuueReasonsName    varchar ( 500) NULL
);
CREATE TABLE   LegelAdvices (
	 LegelAdvID   int  NOT NULL,
	 LegAdvDate   date  NULL,
	 Employee_ID   int  NULL,
	 Customer_ID   int  NULL,
	 ConsultID   int  NULL,
	 LowerID   int  NULL,
	 Fees   decimal (18, 3) NULL);
CREATE TABLE   Loghistory (
	 Log_ID   float  NULL,
	 Employee_ID   int  NULL,
	 Exaplain    varchar ( 500) NULL,
	 Log_Date   datetime  NULL,
	 Log_Time   varchar (50) NULL,
	 Trans_ID   float  NULL,
	 Form_Tag   int  NULL
);
CREATE TABLE   Nationalities (
	 NationalityID   int  NOT NULL,
	 NationalityName    varchar (100) NULL
);
CREATE TABLE   procuration (
	 procurID   int  NOT NULL,
	 ProcurName    varchar (100) NULL 
 );
CREATE TABLE   Profiles (
	 Profile_ID   int  NOT NULL,
	 Profile_Name    varchar (500) NULL,
	 mainform   int  NULL);

CREATE TABLE   saveimg (
	 id1   int   NOT NULL,
	 id    varchar (50) NULL,
	 imagepath  varchar(500)  NULL);
CREATE TABLE   SearchTable (
	 Form_tag   int  NULL,
	 Form_Name   varchar (150) NULL,
	 FTable   varchar (150) NULL,
	 FColDB   varchar (150) NULL,
	 FCName   varchar (150) NULL,
	 FMaster   bit  NULL,
	 SearchHeader   bit  NULL,
	 FType   varchar (150) NULL,
	 Linked   varchar (150) NULL,
	 CodeKey   varchar (150) NULL,
	 LinkedCode   varchar (150) NULL,
	 LinkedName   varchar (150) NULL,
	 tasleme   varchar (150) NULL
);
CREATE TABLE   Serials (
	 Id_Serial   int   NOT NULL,
	 SerialKey    varchar (50) NOT NULL,
	 SerialName    varchar ( 500) NOT NULL,
	 DateStart   date  NOT NULL,
	 DateEnd   date  NOT NULL,
	 Activated   int  NOT NULL);
CREATE TABLE   Settings_table (
	 setting_id   int  NULL,
	 setting_name    varchar (1000) NULL,
	 Setting_value    varchar (4000) NULL
);
CREATE TABLE   Suppliers (
	 Supplier_ID   int  NOT NULL,
	 Supplier_name    varchar (100) NULL,
	 Mobile    varchar (11) NULL,
	 Mandoub_name    varchar (100) NULL);
CREATE TABLE   TaskDocs (
	 DOCID   int  NOT NULL,
	 TaskID   int  NULL,
	 savedate   date  NULL,
	 DocName    varchar ( 500) NULL,
	 DocDetails    varchar ( 500) NULL,
	 DocPath    varchar ( 500) NULL);
CREATE TABLE   TeleAddrDirectly (
	 ID   int  NOT NULL,
	 saveDate   date  NULL,
	 Name    varchar (200) NULL,
	 Mobile1    varchar (11) NULL,
	 Mobile2    varchar (20) NULL,
	 Address    varchar (200) NULL,
	 Notes    varchar (200) NULL);
CREATE TABLE   Users (
	 UserID   int  NOT NULL,
	 UserName    varchar ( 500) NULL,
	 Password   nchar (10) NULL,
	 creadtedDate   date  NULL,
	 updatedDate   date  NULL);
CREATE TABLE   Users_privacy (
	 Form_ID   int  NULL,
	 Function_ID   int  NULL,
	 Profile_ID   int  NULL,
	 Privacy   bit  NULL
);
CREATE TABLE   WorkDocs (
	 DOCID   int  NOT NULL,
	 WorkBusID   int  NULL,
	 savedate   date  NULL,
	 DocName    varchar ( 500) NULL,
	 DocDetails    varchar ( 500) NULL,
	 DocPath    varchar ( 500) NULL);
CREATE TABLE   WorkStatus (
	 ID   int  NOT NULL,
	 WorkBID   int  NULL,
	 WorkStatus   int  NULL,
	 workReason   int  NULL,
	 Employee_ID   int  NULL,
	 notes    varchar ( 500) NULL,
	 ArshefNumber    varchar (50) NULL);
