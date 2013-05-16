SELECT id FROM members WHERE email='$email'

SELECT * FROM members WHERE id='$userid'

SELECT * FROM members WHERE email='$email' AND password='$password' AND emailactivated='1'

SELECT id FROM members WHERE username='$username'

SELECT * FROM members WHERE id='$id'

SELECT * FROM members WHERE id='$id' AND emailactivated='1'



INSERT INTO members (username, country, state, city, accounttype, email, password, signupdate) 
		VALUES('$username','$country','$state','$city','$accounttype','$email','$hashedPass', now())




UPDATE members SET emailactivated='1' WHERE id='$id'

UPDATE members SET country='$country', state='$state', city='$city', bio='$bio' WHERE id='$id'

UPDATE members SET lastlogin=now() WHERE id='$id'