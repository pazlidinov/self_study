from django.db import models
from django.contrib.auth.models import AbstractUser

# Create your models here.


class Profile(AbstractUser):
    first_name = models.CharField(max_length=100)
    last_name = models.CharField(max_length=100)
    phone = models.CharField(max_length=50)
    is_main = models.BooleanField(default=False)
    is_cash = models.BooleanField(default=False)

    def __str__(self):
        return self.first_name + " " + self.last_name
