<!DOCTYPE html>
<html>
<head>
	<title>Website</title>
</head>
<style type="text/css">
	.main{
		display: flex;
		justify-content: center;
	}

	nav a{
		margin-inline: 15px;
	}

	.container{
		border: 2px solid black;
		padding: 20px;
	}
	.col {
		width: 50%;
		padding-inline: 20px;
	}

	.content{
		display: flex;
		justify-self: center;
	}
</style>
<body>
<div class="main">
	<div class="container">
		<center>
		<img src="abc.png" width="30px">
		<string style="font-size: 20px;">Pune University</string>
		<br>
		<br>

		<nav>
			<a href="#">Presentation</a>
			<a href="#">Studies</a>
			<a href="#">Staff</a>
		</nav>
		</center>
		<br>
		<div class="content">
			<div class="col">
				<h3>News</h3>
				<p>New 1 - 25/09/2022<br>Desciption</p>
				<br>
				<p>New 2 - 25/09/2022<br>Desciption</p>
			</div>
			<hr>
			<div class="col">
				<h3>Announcements</h3>
				<p>Open Course 1<br>Desciption</p>
				<br>
				<p>Open Course 2<br>Desciption</p>
			</div>
		</div>

		<footer>
			<center><p>Contact:<a href="#">info@university.com</a><br> &copy; University.2022</p></center>
		</footer>
	</div>
	
</div>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
	<title>Audio Web Page</title>
</head>
<body>
	<h3>Audio Web Page</h3>
	<audio controls autoplay="">
		<src="abc.mp3" audio/mp3>
	</audio>
</body>
</html>

import threading

def square(num):
    print("Square of given number : {}".format (num*num))

def cube(num):
    print("\nCube of given number : {}".format (num*num*num))

if __name__=="__main__":
    t1=threading.Thread(target=square, args= (12,))
    t2=threading.Thread(target=cube, args= (11,))

    t1.start()
    t2.start()
    t1.join()
    t2.join()

print("Multithreading Done!")



class Vehicle:
    def __init__(self,name,max_speed,mileage):
        self.name = name
        self.max_speed = max_speed
        self.mileage = mileage

    def seating_capacity(self,capacity):
        return (f"The seating capcity of a {self.name} is {capacity}")

class Bus(Vehicle):
    def __init__(self,name,max_speed,mileage):
        Vehicle.__init__(self,name,max_speed,mileage)

    def __str__(self):
        return (f"Brand : {self.name}, Maximum Speed : {self.max_speed}, Mileage : {self.mileage}")

    def seating_capacity(self,capacity = 50):
        return super().seating_capacity(capacity = 50)

B = Bus("Bus",190,29)
print(B.seating_capacity())
