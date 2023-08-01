from django.db import models

# Create your models here.

class Leed_user(models.Model):
    name = models.CharField(max_length=150)
    phone = models.PositiveIntegerField(default=0,unique=True)
    age = models.PositiveIntegerField(default=10)
    address = models.TextField()
    
    def __str__(self):
        return self.name