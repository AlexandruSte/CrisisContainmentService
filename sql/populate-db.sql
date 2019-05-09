-- AUTHORITY
-- for testing
INSERT INTO authority (id, name, email, phone, website, address) 
VALUES ('1','Crisis Containment Center','alex.stefan007@gmail.com','123 456 233','https://www.crisisccenter.com/', 'Bachelor Street 12');
INSERT INTO authority (id, name, email, phone, website, address) 
VALUES ('2','Power Nature','danapaduraru941@gmail.com','123 012 555','https://www.powernature.org/', 'General Barthelot Street 12 Iasi');
-- NOT for testing
INSERT INTO authority (id, name, email, phone, website, address) 
VALUES ('3','United States Capitol Police','uscapitolpolice@contact.com','(202) 211 233','https://www.uscp.gov/', '119 D Street, NE Washington, DC 20510');
'Str. Mihai Voda, nr. 6, sector 5, Bucureşti, România');
INSERT INTO authority (id, name, email, phone, website, address) 
VALUES ('4','National Protection','nat_protection@contact.com','(858) 652-9930','https://natprotection.com/', 'San Diego, CA 92191');
INSERT INTO authority (id, name, email, phone, website, address) 
VALUES ('5','Earthquake Hazards Program','nat_protection@contact.com','(202) 846-001','https://earthquake.usgs.gov', '12201 Sunrise Valley Drive, MS 905 ');
INSERT INTO authority (id, name, email, phone, website, address) 
VALUES ('6','Unicef','unicef.contact@info.com','(153) 029 999','https://www.unicef.org/', '12201 9/4 Station 45');
INSERT INTO authority (id, name, email, phone, website, address) 
VALUES ('7','Christian Aid','info@christian-aid.org','020 7620 4444','https://www.christianaid.org.uk/', 'Christian Aid, 35-41 Lower Marsh, London SE1 7RL');
INSERT INTO authority (id, name, email, phone, website, address) 
VALUES ('8','Romanian Police','politiaromana@contact.ro','+201 111 222','https://www.politiaromana.ro/', 'Str. Mihai Voda, nr. 6, sector 5, Bucureşti, România');
INSERT INTO authority (id, name, email, phone, website, address) 
VALUES ('9','Red Cross','contact@redcross.com','+405 444 111','https://www.redcross.org/', 'RedCross Center, Baker Street 221B');
INSERT INTO authority (id, name, email, phone, website, address) 
VALUES ('10','Save the Children','contact@redcross.com','+61 1800 76','https://www.savethechildren.net/', 'Level 6, 250 Victoria Parade, East Melbourne, Victoria 3002');



-- USER
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('1','Dana', 'Paduraru','danapaduraru941@gmail.com','super','Romania', 'Bacau','600204', '1234567901',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('2','Alexandru', 'Stefan','alex.stefan@gmail.com','canguri','Romania', 'Botosani','717311', '555 555 555',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('3','Alexandru', 'Lungu','alex.lungu@mail.com','tw123','Romania', 'Iasi','700259', '07 444 444',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('4','Adrian', 'Gotca','adi.gotca@mail.com','tw456','Romania', 'Iasi','700028', '07 999 444',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('5','John', 'Doe','john.doe@mail.com','mycoolpassword','United Kingdom', 'London','SE7', '0012355122',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('6','Jonas', 'Brothers','jonas123@mail.com','music000','United Kingdom', 'London','SE26', '123 333 333',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('7','Maluma', 'Perder','maluma001@mail.com','CORAZON123','United Kingdom', 'Cambridge','CB1 0AP', '100 100 121',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('8','Anna', 'Wall','anna_wall@mail.com','mesterulmanole','United Kingdom', 'Cambridge','CB1 0DT', '123 100 881',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('9','Sarrah', 'Peterson','sarrahp@mail.com','00ketchup00','United Kingdom', 'Cambridge','CB1 0GR', '100 88712',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('10','Robert', 'Dobert','robdob@mail.com','tomato_classic','United Kingdom', 'Bedford','MK40 1AT', '100 888 121',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('11','Peter', 'Peaky','peter007@mail.com','valoare_energetica','United Kingdom', 'Canterbury','CT1 1AR', '100 888 121',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('12','Ronaldo', 'Mila','ronaldo_gol@mail.com','smecherie','Italy', 'Rome','00164', '+304 444 211',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('13','Alessia', 'Princess','princess909@mail.com','disney123','Italy', 'Rome','00168', '+304 124 566',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('14','Lorenzo', 'Bucovino','lorenzo_buc@mail.com','italyman','Italy', 'Florence','50137', '+302 123 723',);
INSERT INTO person (id, firstname, lastname, email, password, country, city, zipcode, phone) 
VALUES ('15','Antonio', 'Maggiore','antonio_maggiore@mail.com','tastatura','Italy', 'Bologna','40141', '+320 678 946',);


-- ALERT
INSERT INTO alert (id, longitude, latitude, type, description, isSolved) 
VALUES ('1',"11.043762", '43.471833','Wildfire','No people around, does not spread very quicky as there is no grass around. Solved by the fire department in San Gimignano',1);
INSERT INTO alert (id, longitude, latitude, type, description, isSolved) 
VALUES ('2',"52.207560", '0.119528 ','Other','Small duststorm, could affect people outside. Authorities advise people to stay inside until it is gone.',1);

-- MISSING_PERSON
INSERT INTO missing_person (id, firstname, lastname, lastInterraction, description, isSolved, photo, id_user, id_alert) 
VALUES ('1',"Lola", 'Napkins','yesterday at lunch, around 12 PM','blonde, blue eyes, big smile','?',2,1);

-- USER_ALERT
INSERT INTO user_alert (id, id_user, id_alert)  VALUES (1,10,1);

-- AUTHORITY_ALERT
INSERT INTO authority_alert (id, id_user, id_authority)  VALUES (1,1,2);